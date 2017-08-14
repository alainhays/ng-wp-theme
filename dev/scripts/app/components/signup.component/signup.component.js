import controller from './signup.controller';

const SignUpComponent = {
  bindings: {

  },
  controller,
  template: `
    <div class="signup">
        {{ $ctrl.message }}
      <signup-form
        signup="$ctrl.newUser"
        on-signup="$ctrl.signUp($event);">
      </signup-form>
    </div>
  `
};

export default SignUpComponent;