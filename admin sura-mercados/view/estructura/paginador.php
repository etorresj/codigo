
<div id="paginador">
<span class="boxtexto"><a href="index.php?section=<?php echo $_GET['section'] ?>&ord=<?php echo $orden; ?>&pag=0&tipo=<?php echo $_GET['tipo']; ?>&search=<?php echo $search ?>" class="paginador">Inicio</a></span>
<span class="boxtexto"><?php if($pag>0) { ?><a href="index.php?section=<?php echo $_GET['section'] ?>&ord=<?php echo $orden; ?>&pag=<?php echo $pag-1; ?>&tipo=<?php echo $_GET['tipo']; ?>&search=<?php echo $search ?>" class="paginador">< Anterior</a><?php } else echo '<a class="paginador">Anterior</a>'; ?></span>

<?php 
$laPag=0;
if(isset($_GET['pag']))
$laPag=$_GET['pag'];
for($i=0; $i<$paginas; $i++) { 
$laClase="paginador";
if($i==$laPag)
$laClase="paginador_act";
?>
<span class="boxtexto"><a href="index.php?section=<?php echo $_GET['section'] ?>&ord=<?php echo $orden; ?>&pag=<?php echo $i; ?>&tipo=<?php echo $_GET['tipo']; ?>&search=<?php echo $search ?>" class="<?php echo $laClase; ?>"><?php echo $i+1; ?></a></span>
<?php } ?>

<span class="boxtexto"><?php if($pag<$paginas-1) { ?><a href="index.php?section=<?php echo $_GET['section'] ?>&ord=<?php echo $orden; ?>&pag=<?php echo $pag+1; ?>&tipo=<?php echo $_GET['tipo']; ?>&search=<?php echo $search ?>" class="paginador">Siguiente ></a><?php } else echo '<a class="paginador">Siguiente</a>'; ?></span>
<span class="boxtexto"><a href="index.php?section=<?php echo $_GET['section'] ?>&ord=<?php echo $orden; ?>&pag=<?php echo $paginas-1; ?>&tipo=<?php echo $_GET['tipo']; ?>&search=<?php echo $search ?>" class="paginador">Final</a></span>
</div>