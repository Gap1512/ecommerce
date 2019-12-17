$(document).ready(function(){
    var brandid;
    var categoryid;
    var name;

    $('.brandfilter').click(function(){
        $('#productsrow').html('');
        brandid = $(this).val();
        var filters = {};

        if(brandid != '' && brandid != undefined){
            filters["brandid"] = brandid;
        }
        if(categoryid != '' && categoryid != undefined){
            filters["categoryid"] = categoryid;
        }
        if(name != '' && name != undefined){
            filters["name"] = name;
        }

        var newhtml = $.ajax({
            url:'./database/product-select-filter.php',
            type:'post',
            data: filters,
            async:false
        }).responseText;
        $('#productsrow').html(newhtml);
    });


    $('.categoryfilter').click(function(){
        $('#productsrow').html('');
        categoryid = $(this).val();
        var filters = {};
        if(brandid != '' && brandid != undefined){
            filters["brandid"] = brandid;
        }
        if(categoryid != '' && categoryid != undefined){
            filters["categoryid"] = categoryid;
        }
        if(name != '' && name != undefined){
            filters["name"] = name;
        }

        var newhtml = $.ajax({
            url:'./database/product-select-filter.php',
            type:'post',
            data: filters,
            async:false
        }).responseText;
        $('#productsrow').html(newhtml);
    })

    $('#searchbutton').click(function(){
        $('#productsrow').html('');
        name = $('#searchbar').val();
        var filters = {};
        if(brandid != '' && brandid != undefined){
            filters["brandid"] = brandid;
        }
        if(categoryid != '' && categoryid != undefined){
            filters["categoryid"] = categoryid;
        }
        if(name != '' && name != undefined){
            filters["name"] = name;
        }

        console.log(filters);
        var newhtml = $.ajax({
            url:'./database/product-select-filter.php',
            type:'post',
            data: filters,
            async:false
        }).responseText;
        $('#productsrow').html(newhtml);
    })
})