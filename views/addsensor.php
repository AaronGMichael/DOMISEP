<!DOCTYPE html>
<html>
<head>
	<title>PHP Login using OOP Approach</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOMISEP - Login</title>
    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/style-login.css">
    <link rel="stylesheet" type="text/css" href="../css/style-text.css">
    <link rel="stylesheet" type="text/css" href="../css/style-containers.css">
    <link rel="stylesheet" type="text/css" href="../css/style-buttons.css">
    <link rel="stylesheet" type="text/css" href="../css/style-backgrounds.css">
</head>
<style>
    a:hover {
      text-decoration: none;
    }
</style>
<body>
    <div class="background-login-light"></div>
            <section>
                <div class="container mt-5 pt-5">
                    <div class="row">
                        <div class="col-9 col-sm-7 col-md-6 m-auto">
                            <div class="card border-0 shadow">
                                <div class="card-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-upc-scan" viewBox="0 0 16 16">
                                    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5M3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0z"/>
                                </svg>
                                    <h1 class="text-center">Add Sensor</h1>
                                    <form method="POST" action="../utils/addUser.php">
                                        <fieldset>
                                            <div class="form-group">
                                                <label for="sensortype">SensorType:</label>
                                                <select class = "form-control" placeholder="Sensortype" type = "name" name = "sensortype" required>
                                                    <option value = "" disabled selected>Select</option>
                                                    <option value="y">Heat</option>
                                                    <option value="x">Humidity</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="minvalue">Min Value:</label>
                                                <input class="form-control" placeholder="Minvalue" type="name" name="minvalue" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="maxvalue">Max Value:</label>
                                                <input class="form-control" placeholder="Maxvalue" type="name" name="maxvalue" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name:</label>
                                                <input class="form-control" placeholder="Name" type="name" name="name" required>
                                            </div>


                                            <button type="submit" name="register" class="button-submit btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Add</button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                            <h6 class="text-white">© 2023 WebWizards</span>
                        </div>
                    </div>
                </div>
            </section>
</body>