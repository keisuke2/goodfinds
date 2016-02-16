<?php echo $this->Html->script('jquery-1.11.3.min.js');?>
<?php echo $this->Html->script('bootstrap.min.js');?>

<script type="text/javascript">
    $(window).scroll(function() {
      if ($(document).scrollTop() > 50) {
        $('.navbar').addClass('navbar-shrink');
    } else {
        $('.navbar').removeClass('navbar-shrink');
    }
    });
</script>