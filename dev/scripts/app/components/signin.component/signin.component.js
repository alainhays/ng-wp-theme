import controller from './signin.controller';

const SignInComponent = {
  bindings: {

  },
  controller,
  template: `
    <div class="signin">
        {{ $ctrl.message }}
      <signinform></signinform>
    </div>
  `
};

export default SignInComponent;