<!--การทำงานของล็อคอิน block login-->

<div class="content-wrapper">
  <form action="index.php?Node=chk" method="POST" autocomplete='off' class='login'>
  <!-- <input name="user" placeholder="Username" type="text">
  <input name="pass" placeholder="Password" type="password">
  <button class='btn block-cube block-cube-hover' type='submit' name="btlogin">

    <div class='bg-top'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg-right'>
      <div class='bg-inner'></div>
    </div>
    <div class='bg'>
      <div class='bg-inner'></div>
    </div>
    <div class='text'>
      Log In
    </div>
  </button> -->
  <section> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span> <span></span>

    <div class="signin">
      <div class="content">
        <h2>Sign In</h2>
        <div class="form">
          <div class="inputBox">
            <input type="text" name="user" required> <i>Username</i>
          </div>
          <div class="inputBox">
            <input type="password" name="pass" required> <i>Password</i>
          </div>
          <div class="inputBox">
            <input type="submit" value="Login" name="btnlogin">
          </div>
        </div>
      </div>
    </div>
  </section> <!-- partial -->
</div>

</form>
  
<!-- การปรับแต่งของ block login-->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap');



  section {
    position: absolute;
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 2px;
    flex-wrap: wrap;
    overflow: hidden;
  }

  section::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(#000, #0f0, #000);
    animation: animate 5s linear infinite;
  }

  @keyframes animate {
    0% {
      transform: translateY(-100%);
    }

    100% {
      transform: translateY(100%);
    }
  }

  section span {
    position: relative;
    display: block;
    width: calc(6.25vw - 2px);
    height: calc(6.25vw - 2px);
    background: #181818;
    z-index: 2;
    transition: 1.5s;
  }

  section span:hover {
    background: #0f0;
    transition: 0s;
  }

  section .signin {
    position: absolute;
    width: 400px;
    background: #222;
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px;
    border-radius: 4px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 9);
  }

  section .signin .content {
    position: relative;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 40px;
  }

  section .signin .content h2 {
    font-size: 2em;
    color: #0f0;
    text-transform: uppercase;
  }

  section .signin .content .form {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 25px;
  }

  section .signin .content .form .inputBox {
    position: relative;
    width: 100%;
  }

  section .signin .content .form .inputBox input {
    position: relative;
    width: 100%;
    background: #333;
    border: none;
    outline: none;
    padding: 25px 10px 7.5px;
    border-radius: 4px;
    color: #fff;
    font-weight: 500;
    font-size: 1em;
  }

  section .signin .content .form .inputBox i {
    position: absolute;
    left: 0;
    padding: 15px 10px;
    font-style: normal;
    color: #aaa;
    transition: 0.5s;
    pointer-events: none;
  }

  .signin .content .form .inputBox input:focus~i,
  .signin .content .form .inputBox input:valid~i {
    transform: translateY(-7.5px);
    font-size: 0.8em;
    color: #fff;
  }

  .signin .content .form .links {
    position: relative;
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  .signin .content .form .links a {
    color: #fff;
    text-decoration: none;
  }

  .signin .content .form .links a:nth-child(2) {
    color: #0f0;
    font-weight: 600;
  }

  .signin .content .form .inputBox input[type="submit"] {
    padding: 10px;
    background: #0f0;
    color: #000;
    font-weight: 600;
    font-size: 1.35em;
    letter-spacing: 0.05em;
    cursor: pointer;
  }

  input[type="submit"]:active {
    opacity: 0.6;
  }

  @media (max-width: 900px) {
    section span {
      width: calc(10vw - 2px);
      height: calc(10vw - 2px);
    }
  }

  @media (max-width: 600px) {
    section span {
      width: calc(20vw - 2px);
      height: calc(20vw - 2px);
    }
  }

  /* .login {
    overflow: hidden;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 30px;
    border-radius: 50px;
    position: absolute;
    top: 50%;
    left: 50%;
    width: 350px;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    -webkit-transition: -webkit-transform 300ms, box-shadow 300ms;
    -moz-transition: -moz-transform 300ms, box-shadow 300ms;
    transition: transform 300ms, box-shadow 300ms;
    box-shadow: 5px 10px 10px rgba(2, 128, 144, 0.2);
  }

  .login::after,
  .login::before {
    content: "";
    position: absolute;
    width: 600px;
    height: 600px;
    border-top-left-radius: 40%;
    border-top-right-radius: 45%;
    border-bottom-left-radius: 35%;
    border-bottom-right-radius: 40%;
    z-index: -1;
  }

  .login::before {
    left: 40%;
    bottom: -130%;
    background-color: rgba(69, 105, 144, 0.15);
    -webkit-animation: wawes 6s infinite linear;
    -moz-animation: wawes 6s infinite linear;
    animation: wawes 6s infinite linear;
  }

  .login::after {
    left: 35%;
    bottom: -125%;
    background-color: rgba(2, 128, 144, 0.2);
    -webkit-animation: wawes 7s infinite;
    -moz-animation: wawes 7s infinite;
    animation: wawes 7s infinite;
  }

  .login>input {
    font-family: "Asap", sans-serif;
    display: block;
    border-radius: 5px;
    font-size: 16px;
    background: white;
    width: 100%;
    border: 5;
    padding: 10px;
    margin: 15px -10px;
  }

  .login>button {
    font-family: "Asap", sans-serif;
    cursor: pointer;
    color: #fff;
    font-size: 16px;
    text-transform: uppercase;
    width: 80px;
    border: 0;
    padding: 10px 0;
    margin-top: 10px;
    margin-left: -5px;
    border-radius: 90px;
    background-color: #f45b69;
    -webkit-transition: background-color 300ms;
    -moz-transition: background-color 300ms;
    transition: background-color 300ms;
  }

  @-webkit-keyframes wawes {
    from {
      -webkit-transform: rotate(0);
    }

    to {
      -webkit-transform: rotate(360deg);
    }
  }

  @-moz-keyframes wawes {
    from {
      -moz-transform: rotate(0);
    }

    to {
      -moz-transform: rotate(360deg);
    }
  }

  @keyframes wawes {
    from {
      -webkit-transform: rotate(0);
      -moz-transform: rotate(0);
      -ms-transform: rotate(0);
      -o-transform: rotate(0);
      transform: rotate(0);
    }

    to {
      -webkit-transform: rotate(360deg);
      -moz-transform: rotate(360deg);
      -ms-transform: rotate(360deg);
      -o-transform: rotate(360deg);
      transform: rotate(360deg);
    }
  } */
</style>