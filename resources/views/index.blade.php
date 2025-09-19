<!DOCTYPE html>
<html>
<head>
    <title>Employee System</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; padding-top: 80px; background: #5a4c4c42; }
        h1 { margin-bottom: 40px; }
        .btn { display: block; width: 200px; padding: 15px; margin: 15px auto; font-size: 16px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; color: white; }
        .add { background: #4CAF50; }
        .read { background: #2196F3; }
        
       
    </style>
</head>
<body>
    <h1>Employee Management</h1>

   
    <a href="{{ route('employees.index') }}" class="btn read">Read Employees</a>

    

</body>
</html>
