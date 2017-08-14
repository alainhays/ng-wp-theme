import angular from 'angular';
import uiRouter from 'angular-ui-router';
import SignInForm from './signin-form.component';

const signInForm = angular
  .module('signinform', [uiRouter])
  .component('signinform', SignInForm)
  .name;

export default signInForm;