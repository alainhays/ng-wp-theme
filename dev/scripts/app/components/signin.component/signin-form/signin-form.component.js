import controller from './signin-from.controller'

const SignInForm = {
  bindings: {},
  controller,
  template: `
    <form class="loginForm" name="$ctrl.loginForm" ng-submit="$ctrl.onSubmit().$valid" novalidate>
      <div class="loginForm__group" ng-class="{ 'has-error' : $ctrl.loginForm.username.$invalid && $ctrl.loginForm.username.$touched }">
        <input type="text" name="username" ng-model="$ctrl.username" placeholder="Username" required />
      </div>

      <div class="loginForm__group" ng-class="{ 'has-error' : $ctrl.loginForm.password.$invalid && $ctrl.loginForm.password.$touched }">
        <input type="password" name="password" ng-model="$ctrl.password" placeholder="Password" required/>
      </div>

      <div class="formError" ng-show="$ctrl.loginError"> {{ $ctrl.loginErrorMessage }} </div>

      <input type="submit" value="Submit" />
    </form>
  `
};

export default SignInForm;