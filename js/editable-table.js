//bootstable.js
/*
Bootstable
 @description  Javascript library to make HMTL tables editable, using Bootstrap
 @version 1.1
 @autor Tito Hinostroza
*/
  "use strict";
  //Global variables
  var params = null;  		//Parameters
  var colsEdi =null;
  var newColHtml = '<div class="btn-group pull-right">'+
'<button id="bEdit" type="button" class="btn btn-sm btn-default" onclick="rowEdit(this);">' +
'<span class="fas fa-pencil-alt" > </span>'+
'</button>'+
'<button id="bElim" type="button" class="btn btn-sm btn-default" onclick="rowElim(this);">' +
'<span class="fas fa-trash" > </span>'+
'</button>'+
'<button id="bAcep" type="button" class="btn btn-sm btn-default" style="display:none;" onclick="rowAcep(this);">' + 
'<span class="fas fa-check-circle" > </span>'+
'</button>'+
'<button id="bCanc" type="button" class="btn btn-sm btn-default" style="display:none;" onclick="rowCancel(this);">' + 
'<span class="fas fa-times" > </span>'+
'</button>'+
    '</div>';
  var colEdicHtml = '<td name="buttons">'+newColHtml+'</td>'; 
    
  $.fn.SetEditable = function (options) {
    var defaults = {
        columnsEd: null,         //Index to editable columns. If null all td editables. Ex.: "1,2,3,4,5"
        $addButton: null,        //Jquery object of "Add" button
        onEdit: function() {},   //Called after edition
		onBeforeDelete: function() {}, //Called before deletion
        onDelete: function() {}, //Called after deletion
        onAdd: function() {}     //Called when added a new row
    };
    params = $.extend(defaults, options);
    this.find('thead tr').append('<td name="buttons"><span class="glyphicon glyphicon-thumbs-up"></span></td>');  //encabezado vacío
    this.find('tbody tr').append(colEdicHtml);
	var $tabedi = this;   //Read reference to the current table, to resolve "this" here.
    //Process "addButton" parameter
    if (params.$addButton != null) {
        //Se proporcionó parámetro
        params.$addButton.click(function() {
            rowAddNew($tabedi.attr("id"));
        });
    }
    //Process "columnsEd" parameter
    if (params.columnsEd != null) {
        //Extract felds
        colsEdi = params.columnsEd.split(',');
    }
  };
function IterarCamposEdit($cols, tarea) {
//Itera por los campos editables de una fila
    var n = 0;
    $cols.each(function() {
        n++;
        if ($(this).attr('name')=='buttons') return;  //excluye columna de botones
        if (!EsEditable(n-1)) return;   //noe s campo editable
        tarea($(this));
    });
    
    function EsEditable(idx) {
    //Indica si la columna pasada está configurada para ser editable
        if (colsEdi==null) {  //no se definió
            return true;  //todas son editable
        } else {  //hay filtro de campos
//alert('verificando: ' + idx);
            for (var i = 0; i < colsEdi.length; i++) {
              if (idx == colsEdi[i]) return true;
            }
            return false;  //no se encontró
        }
    }
}
function FijModoNormal(but) {
    $(but).parent().find('#bAcep').hide();
    $(but).parent().find('#bCanc').hide();
    $(but).parent().find('#bEdit').show();
    $(but).parent().find('#bElim').show();
    var $row = $(but).parents('tr');  //accede a la fila
    $row.attr('id', '');  //quita marca
}
function FijModoEdit(but) {
    $(but).parent().find('#bAcep').show();
    $(but).parent().find('#bCanc').show();
    $(but).parent().find('#bEdit').hide();
    $(but).parent().find('#bElim').hide();
    var $row = $(but).parents('tr');  //accede a la fila
    $row.attr('id', 'editing');  //indica que está en edición
}
function ModoEdicion($row) {
    if ($row.attr('id')=='editing') {
        return true;
    } else {
        return false;
    }
}
function rowAcep(but) {
    //Verificar se item já existe ou não
    var tabela = $(but).parents('table').attr('tabela');
    var campo = $(but).parents('table').attr('campo');
    var id = $(but).parents('tr')[0].cells[0].innerText;

    if(id!='' && id!=undefined){
        updateDb(but, id);
    }
    else{
        insertDb(but);
    }

/*     $.ajax({
        url:'./database/check-id.php',
        type:'POST',
        data: {'tabela': tabela, 'campo': campo, 'id': id},
        success: function(response){
            if(response==1){
                updateDb(but, id);
            }
            else{
                insertDb(but);
            }
        }
    }); */
}

function insertDb(but){
    var post_url = './database/product-insert.php';
    //Faz o submit dos inputs
    var $row = $(but).parents('tr');  //accede a la fila
    var $cols = $row.find('td');  //lee campos
    var id_col = $cols[0];
    $cols.splice(0,1);


    //Cria formulário
    var i = 1;
    var formHtml = "<form id='form' method='post' style='display: none'>";

    IterarCamposEdit($cols, function($td){
        let name = $('th')[i].innerText.toLowerCase();
        if($td.attr('tipo') == 'select')
            formHtml += "<input value='" + $td.find('select').val() + "' name='" + name + "'>";
        else   
            formHtml += "<input value='" + $td.find('input').val() + "' name='" + name + "'>";
        i++;
    });
    formHtml += "<input type='submit'></form>";
    $row.append(formHtml);
    //


    var form = $row.find('form');

    form.submit(function(e){
        e.preventDefault();
        $.ajax({
            url:post_url,
            type:'post',
            data: form.serialize(),
            success: function(id){
                id_col.innerText = id;
            }
        });
    });

    form.submit();
    form.remove();

//Acepta los cambios de la edición
    var $row = $(but).parents('tr');  //accede a la fila
    var $cols = $row.find('td');  //lee campos
    if (!ModoEdicion($row)) return;  //Ya está en edición
    //Está en edición. Hay que finalizar la edición
    IterarCamposEdit($cols, function($td) {  //itera por la columnas
      var cont = $td.find('input').val(); //lee contenido del input
      $td.html(cont);  //fija contenido y elimina controles
    });
    FijModoNormal(but);
    params.onEdit($row);
}

function updateDb(but, id){
    var post_url = './database/products-update.php';
    //Faz o submit dos inputs
    var $row = $(but).parents('tr');  //accede a la fila
    var $cols = $row.find('td');  //lee campos
    $cols.splice(0,1);

    //Cria formulário
    var i = 1;
    var formHtml = "<form id='form' method='post' style='display: none'>";

    IterarCamposEdit($cols, function($td){
        let name = $('th')[i].innerText.toLowerCase();
        if($td.attr('tipo') == 'select')
            formHtml += "<input value='" + $td.find('select').val() + "' name='" + name + "'>";
        else   
            formHtml += "<input value='" + $td.find('input').val() + "' name='" + name + "'>";
        i++;
    });

    formHtml += "<input name='id' value='"+id+"'>";
    formHtml += "<input type='submit'></form>";
    $row.append(formHtml);
    //


    var form = $row.find('form');

    form.submit(function(e){
        e.preventDefault();
        $.ajax({
            url:post_url,
            type:'post',
            data: form.serialize(),
        });
    });

    form.submit();
    form.remove();
//Acepta los cambios de la edición
    var $row = $(but).parents('tr');  //accede a la fila
    var $cols = $row.find('td');  //lee campos
    if (!ModoEdicion($row)) return;  //Ya está en edición
    //Está en edición. Hay que finalizar la edición
    IterarCamposEdit($cols, function($td) {  //itera por la columnas
      var cont = $td.find('input').val(); //lee contenido del input
      $td.html(cont);  //fija contenido y elimina controles
    });
    FijModoNormal(but);
    params.onEdit($row);
}

function rowCancel(but) {
//Rechaza los cambios de la edición
    var $row = $(but).parents('tr');  //accede a la fila
    var $cols = $row.find('td');  //lee campos
    if (!ModoEdicion($row)) return;  //Ya está en edición
    //Está en edición. Hay que finalizar la edición
    IterarCamposEdit($cols, function($td) {  //itera por la columnas
        var cont = $td.find('div').html(); //lee contenido del div
        $td.html(cont);  //fija contenido y elimina controles
    });
    FijModoNormal(but);
}
function rowEdit(but) {  //Inicia la edición de una fila
    var $row = $(but).parents('tr');  //accede a la fila
    var $cols = $row.find('td');  //lee campos
    var tabela = $(but).parents('table').attr('tabela');
    $cols.splice(0,1);

    if(tabela == 'products')
        $cols.splice(9,2);

    if (ModoEdicion($row)) return;  //Ya está en edición

    //Pone en modo de edición
    IterarCamposEdit($cols, function($td) {  //itera por la columnas
        var cont = $td.html(); //lee contenido
        var div = '<div style="display: none;">' + cont + '</div>';  //guarda contenido
        var input = '<input class="form-control input-sm"  value="' + cont + '">';
        $td.html(div + input);  //fija contenido
    });
    FijModoEdit(but);
}
function rowElim(but) {  //Elimina la fila actual
    var $row = $(but).parents('tr');  //accede a la fila
    var tabela = $(but).parents('table').attr('tabela');
    var id = $(but).parents('tr')[0].cells[0].innerText;
    
    if(tabela == 'products')
        var post_url = './database/product-delete.php'

    $row.append("<form id='form' method='post'><input value='"+id+"' name='id'>  <input type='submit'>  </form>");

    var form = $row.find('form');
    console.log(form.html());
    form.submit(function(e){
        e.preventDefault();
        $.ajax({
            url:post_url,
            type:'post',
            data: form.serialize(),
        });
    });
    form.submit();
    form.remove();

    params.onBeforeDelete($row);
    $row.remove();
    params.onDelete();


}


function rowAddNew(tabId) {  //Agrega fila a la tabla indicada.
var $tab_en_edic = $("#" + tabId);  //Table to edit
    var $filas = $tab_en_edic.find('tbody tr');
    if ($filas.length==0) {
        //No hay filas de datos. Hay que crearlas completas
        var $row = $tab_en_edic.find('thead tr');  //encabezado
        var $cols = $row.find('th');  //lee campos
        //construye html
        var htmlDat = '';
        $cols.each(function() {
            if ($(this).attr('name') == 'buttons') {
                //Es columna de botones
                htmlDat = htmlDat + colEdicHtml;  //agrega botones
            } else {
                if($(this).attr('tipo') == 'select'){
                    var tabela = $tab_en_edic.attr('tabela');
                    var selection = $(this).attr('selection');
                    if(tabela == 'products'){
                        htmlDat = htmlDat + '<td tipo="select">'+
                        $.ajax({
                            url:'./database/'+selection+'-selection-newrow.php',
                            type:'post',
                            dataType: "html",
                            async:false
                        }).responseText
                        +'</td>';
                    }
                }
                else
                    htmlDat = htmlDat + '<td></td>';
            }
        });
        $tab_en_edic.find('tbody').append('<tr>'+htmlDat+'</tr>');
    } else {
    
        //Hay otras filas, podemos clonar la última fila, para copiar los botones
        var $ultFila = $tab_en_edic.find('tr:last');
        $ultFila.clone().appendTo($ultFila.parent());  
        $ultFila = $tab_en_edic.find('tr:last');
        var $cols = $ultFila.find('td');  //lee campos
        $cols.each(function() {
            if ($(this).attr('name')=='buttons') {
                //Es columna de botones
            } else {
                if($(this)[0].cellIndex == 0)
                    $(this).html('');  //limpia contenido
            }
        });
    }
	params.onAdd();
}


function getDropdownSelection(selection){
    var result = null;
    $.ajax({
        url:'./database/'+selection+'-selection-newrow.php',
        type:'get',
        success: function(response){
            result = response;
        }
    });
    return result;
}

function TableToCSV(tabId, separator) {  //Convierte tabla a CSV
    var datFil = '';
    var tmp = '';
	var $tab_en_edic = $("#" + tabId);  //Table source
    $tab_en_edic.find('tbody tr').each(function() {
        //Termina la edición si es que existe
        if (ModoEdicion($(this))) {
            $(this).find('#bAcep').click();  //acepta edición
        }
        var $cols = $(this).find('td');  //lee campos
        datFil = '';
        $cols.each(function() {
            if ($(this).attr('name')=='buttons') {
                //Es columna de botones
            } else {
                datFil = datFil + $(this).html() + separator;
            }
        });
        if (datFil!='') {
            datFil = datFil.substr(0, datFil.length-separator.length); 
        }
        tmp = tmp + datFil + '\n';
    });
    return tmp;
}

//apply
$("#table-list").SetEditable({
        $addButton: $('#add')
    });