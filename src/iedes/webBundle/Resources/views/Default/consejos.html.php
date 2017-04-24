<?php $view->extend('::base.html.php');

?>

<!-- 
<div class="container cont_pdf hidden-xs hidden-sm hidden-md hidden-lg">
	<object class="pdf" data="/pdf/guia_de_uso.pdf" type="application/pdf"></object> 
</div>
-->

<script src="/js/jquery.media.js"></script>


<div class="container espacio">
	<div class="row">
            <div class="col-xs-12">
                <a class="media" href="/pdf/guia_de_uso.pdf"></a> 
            </div>
        </div>
</div>

<script>
    $('a.media').media();
</script>