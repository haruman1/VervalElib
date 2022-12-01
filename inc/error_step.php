<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorry, Wrong step <?php echo $step_keberapa ?></title>
</head>

<body>

</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    Swal.fire({
        title: 'Error for step <?php echo $step_keberapa ?> !',
        text: '<?php echo $pesanError ?>',
        icon: 'error',
        confirmButtonText: 'Come Back'
    }).then(function() {
        window.location = "?step=<?php echo $step_keberapa ?>";
    });
</script>

</html>