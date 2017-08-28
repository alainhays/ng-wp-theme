import controller from './signin.controller';

const SignInComponent = {
  bindings: {

  },
  controller,
  template: `
        {{ $ctrl.message }}
      <signinform></signinform>
  `
};

export default SignInComponent;