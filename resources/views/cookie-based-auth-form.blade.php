<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
    <style>
      /* base */
      @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap");

      *,
      *:before,
      *:after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        min-height: 100vh;
        font-family: "Montserrat", sans-serif;
      }

      /* form */
      .form {
        display: flex;
        flex-direction: column;
        padding: 35px 50px 50px 50px;
        max-width: 400px;
        border-radius: 12px;
        background: #f5f5f5;
        color: #5b5b5b;
      }

      .form__control {
        margin-top: 15px;
      }

      .form__control-ttl {
        display: inline-block;
        margin-bottom: 4px;
        font-size: 14px;
      }

      .form__control-message {
        display: block;
        margin-top: 20px;
        text-align: center;
      }

      .form-message {
        font-size: 13px;
        color: #eb5c5c;
      }

      /* input */
      .form-input {
        min-height: 40px;
        width: 100%;
        padding: 0 20px;
        border-radius: 8px;
        background: #fff;
        color: #5b5b5b;
        outline: 0;
        border: 1px solid transparent;
        transition: border ease-out 0.1s;
      }

      .form-input::placeholder {
        color: #909090;
      }

      .form-input:focus {
        border-color: #7d69c3;
      }

      /* button */
      .form__control-button {
        text-align: center;
        margin-top: 20px;
      }

      .form-button {
        background: #8d7dc1;
        color: #fff;
        outline: 0;
        border: 0;
        height: 40px;
        min-width: 140px;
        border-radius: 40px;
        cursor: pointer;
        transition: background ease-out 0.2s;
      }

      .form-button:hover {
        background: #9a8cc8;
      }
    </style>
  </head>
  <body>
    <!-- form start -->
    <form class="form">
      <div class="form__control">
        <label for="basic_username" class="form__control-ttl">Username</label>
        <input
          type="text"
          name="basic_username"
          id="basic_username"
          class="form-input"
          placeholder="Please enter username"
        />
      </div>
      <div class="form__control">
        <label for="basic_password" class="form__control-ttl">Password</label>
        <input
          type="password"
          name="basic_password"
          id="basic_password"
          class="form-input"
          placeholder="Please enter password"
        />
      </div>
      @if (Request::get('basic_username') || Request::get('basic_password'))
        <div class="form__control-message">
          <p class="form-message">Invalid credentials</p>
        </div>
      @endif
      <div class="form__control-button">
        <button class="form-button">Submit</button>
      </div>
    </form>
    <!-- form end -->
  </body>
</html>