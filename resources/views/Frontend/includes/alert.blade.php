@if(Session('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Error</h4>
    {{ Session('error') }}
  </div>
  @endif

  @if(Session('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Success</h4>
    {{ Session('success') }}
  </div>
  @endif

<?php
  if(Session('messages')){
    $messages = Session('messages');
    if(!empty($messages['error'])){
?>
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Error</h4>
    <?php echo $messages['error']; ?>
  </div>
<?php }
 if(!empty($messages['success'])){
?>

  <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success</h4>
        <?php echo $messages['success']; ?>
      </div>
<?php
  }
}
?>
