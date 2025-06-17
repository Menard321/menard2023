<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <title>Register</title>
  </head>
  <body class="d-flex justify-content-center align-items-center vh-100">
    <div
      class="border border-primary p-4 rounded shadow bg-white"
      style="width: 350px"
    >
      <form action="backend/register_handling.php" method="POST">
        <div class="mb-4">
           <!-- <label for="first name" class="form-label"
            >First Name</label>  -->
          <input
            type="fName"
            class="form-control"
            required
            name="fName"
            placeholder="fullName"
          />
          <div id="emailHelp" class="form-text"></div>
        </div>
       
          <div class="mb-4">
          <!-- <label for="address" class="form-label">Address</label> -->
          <input
            type="address"
            class="form-control"
            placeholder="address"
            name="address"
          />
          <div class="mb-4">
            <!-- <label for="phoneNumber" class="form-label">Phone Number</label>  -->
            <input
              style="margin-top:10px"
              type="tel"
              class="form-control"
              name="phoneNo"
              placeholder="Phone number"
            />
          </div>
          <div class="mb-4">
            <!-- <label for="dob" class="form-label">Age</label>  -->
            <input
              type="number"
              class="form-control"
              placeholder="age"
              name="age"
            />
          </div>

    
    
            <!-- create password -->
           <div class="mb-4">
  
            <input
              type="password"
              class="form-control"
              placeholder="Create Password"
              pattern="(?=.*[A-Z])(?=.*\d).{5,}"
              title="Must be at least 8 characters, with at least one uppercase letter and one number"
              name="password"
            />
          </div>

            <!-- confirm password -->
           <div class="mb-4">
            <input
              type="password"
              class="form-control"
              placeholder="Confirm Password"
              pattern="(?=.*[A-Z])(?=.*\d).{8,}"
              title="Must be at least 8 characters, with at least one uppercase letter and one number"
              name="confirm_password"
            />
          </div>


        </div>
        <div class="mb-4 form-check">
          <input type="checkbox" class="form-check-input" id="exampleCheck1" />
          <label class="form-check-label" for="exampleCheck1"
            >Remember me</label
          >
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
        <a href="login.php">Have an account? login</a>
      </form>
    </div>
  </body>
</html>
