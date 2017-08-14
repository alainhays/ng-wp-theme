import controller from './signin-from.controller'

const SignInForm = {
  bindings: {},
  controller,
  template: `
    <form id="login_form" method="post">
      <input type="text" name="username" id="username" placeholder="Username" />
      <input type="password" name="password" id="password" placeholder="Password" />
      <input type="email" name="email" placeholder="E-mail" />
      <input type="submit" id="login_submit" />
    </form>
  `
};

export default SignInForm;