<?php

if( !function_exists( 'freightCalculation' ))
{
   function freightCalculation($origin, $destiny, $weight, $volume, $price){

      $side = pow($volume, 1/3);
      $side = ($side < 15) ? 15 : $side;
      $weight = ($weight > 15) ? 15 : $weight;
 
      $correios = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=".$origin."&sCepDestino=".$destiny."&nVlPeso=".$weight."&nCdFormato=1&nVlComprimento=".$side."&nVlAltura=".$side."&nVlLargura=".$side."&sCdMaoPropria=n&nVlValorDeclarado=".$price."&sCdAvisoRecebimento=n&nCdServico=41106&nVlDiametro=0&StrRetorno=xml";;
 
      $xml = simplexml_load_file($correios);

      if($xml->cServico->Erro == '0'){
         
         echo '<strong>Freight Price: </strong>'.$xml -> cServico -> Valor.'<br>';
         echo '<strong>Deliever Time: </strong>'.$xml -> cServico -> PrazoEntrega.' Days<br>';
      }
   }
}

?>