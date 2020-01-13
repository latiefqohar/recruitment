<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Api</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container ">
        <div class="row ">
            <div class="col align-self-end mt-3">
                <a href="{{ url('/refresh') }}" class="btn btn-primary float-right">Refresh</a>
            </div>
        </div>
        <div class="row">
        <?php foreach($data as $row){ ?> 
            <div class="col-lg-4 mt-3 mb-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        <img src="{{$row['owner']['image']}}"  class="rounded"  style="width:50px;">
                        <span>{{$row['owner']['nameTitle']." ".$row['owner']['firstName']." ".$row['owner']['lastName']}}</span>
                </div>
                    <img src="{{$row['image']}}" class="card-img-top" style="height:200px">
                    <div class="card-body">
                       <?php 
                       for ($i=0; $i < count($row['tags'])  ; $i++) { ?> 
                        <span class="badge badge-secondary">{{$row['tags'][$i]}}</span>
                       <?php }
                       ?>
                        <p class="card-text">{{$row['message']}}</p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

</html>
