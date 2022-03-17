<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body style="background-color:  #FAFFC1;">
<div class=" p-3 style shadow-sm bg-white  container-fluid w-25 mx-auto" style="border-radius: 3%; min-width: 300px; dispaly: flex; align-items:center; justify-content:center;">
    <div class="pt-3 ps-3 text1">
        <h1 class="fw-bold"><span class="border-start pe-2 border-4 border-info"></span>E-classe</h1>
    </div>
    <div class="pt-3 text-center">
        <h3 >STUDENTS</h3>
        <p class="text-muted" style="font-size: 70%;">Enter the informations to add new students.</p>
    </div>       
    <form method="POST" action="page3.php";>
        <div class="mb-3">
          <label for="exampleInputnamel1" class="form-label">NAME</label>
          <input type="text" name="nom" class="form-control" id="exampleInputname1" placeholder="Enter name">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Payment Schedule</label>
            <input type="text" name="pschedule" class="form-control"  placeholder="Enter email">
        </div>
        <div class="mb-3">
            <label for="exampleInputphone1" class="form-label">Bill Number</label>
            <input type="number" name="bnumber" class="form-control" placeholder="Enter phone namber" >
        </div>
        <div class="mb-3">
            <label for="exampleInputenumber1" class="form-label">Amount Paid</label>
            <input type="number" name="apaid" class="form-control" placeholder="Enter enroll number">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Balance amount</label>
            <input type="number" class="form-control" name="bamount"  placeholder="Enter date of admission">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Date</label>
            <input type="date" class="form-control" name="date"  placeholder="Enter date of admission">
        </div>
        <button type="submit" style="background: linear-gradient(69.66deg, #00C1FE 19.39%, #FAFFC1 96.69%); width:100%">ENVOYER</button>
    </form>
</div>
</body>
</html>