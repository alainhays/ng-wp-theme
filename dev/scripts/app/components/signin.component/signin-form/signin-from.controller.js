class SignInFormController {
  constructor(SignInService) {
    this.loginError = false;
    this.loginErrorMessage = '';
    this.signInService = SignInService;
  };

  onSubmit() {
    if(this.loginForm.$invalid) {
      this.loginError = true;
      this.loginErrorMessage = this.validateEmptyFields(this.loginForm);
      return false;
    }
    this.signInService.loginUser(this.loginForm.username.$viewValue, this.loginForm.password.$viewValue)
      .then( (response) => {
          console.log('success -', response);

          if(!response.success) {
            this.loginError = true;
            this.loginErrorMessage = response.error;
          } else {
            this.loginError = false;
            this.loginErrorMessage = '';
          }
        })
        .catch( (error) => {
          console.error('error', error);
        });

  };

  validateEmptyFields(form) {
    // console.log(form);
    let errorMessage = '';
    angular.forEach(form.$$controls, (key, val) => {
      if(key.$viewValue === undefined) {
        errorMessage =  'There are empty fields!';
      }
    });
    return errorMessage;
  }
};

export default SignInFormController;