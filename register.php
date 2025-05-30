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
    <title>Login Page</title>
  </head>
  <body class="d-flex justify-content-center align-items-center vh-100">
    <div
      class="border border-primary p-4 rounded shadow bg-white"
      style="width: 350px"
    >
      <form>
        <div class="mb-4">
           <label for="first name" class="form-label"
            >First Name</label
          > 
          <input
            type="fname"
            class="form-control"
            
            placeholder="first name"
          />
          <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-4">
          <label for="last name" class="form-label">Lastname</label>
          <input
            type="last name"
            class="form-control"
           placeholder="last name"
          />
      </div>
          <div class="mb-4">
          <label for="address" class="form-label">Address</label>
          <input
            type="address"
            class="form-control"
            placeholder="address"
          />
          <div class="mb-4">
            <label for="phoneNumber" class="form-label">Phone Number</label> 
            <input
              type="tel"
              class="form-control"
              placeholder="Enter your phone number"
            />
          </div>
          <div class="mb-4">
            <label for="dob" class="form-label">Age</label> 
            <input
              type="number"
              class="form-control"
              placeholder="age"
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
        <a href="login.php">Have an account?</a>
      </form>
    </div>
  </body>
</html>
