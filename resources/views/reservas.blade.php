<!DOCTYPE html>
<html>
 <head>
  <title>Pruba tecnica WAM</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container box">
   <div class="panel panel-default">
    <div class="panel-heading">
        <div class="btn-group pull-right">
            <a href="#" target="_blank" class="btn btn-default btn-sm">JSON</a>
        </div>
        <h4>Listado Reservas</h4>
    </div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Buscar" />
     </div>
     <div class="table-responsive">
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Localizador</th>
         <th>Huesped</th>
         <th>Fecha Entrada</th>
         <th>Fecha Salida</th>
         <th>Hotel</th>
         <th>Precio</th>
         <th>Acciones</th>
        </tr>
       </thead>
       <tbody>
       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
 </body>
</html>
<script>
    $(document).ready(function(){
    
     fetch_reservation_data();
    
        function fetch_reservation_data(query = '') {
            $.ajax({
                url:"{{ route('search.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data){
                    $('tbody').html(data.table_data);
                }
            })
        }
    
        $(document).on('keyup', '#search', function(){
            var query = $(this).val();
            fetch_reservation_data(query);
        });
    });
    </script>