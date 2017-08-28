import angular from 'angular';
import ngMessages from 'angular-messages';
import uiRouter from 'angular-ui-router';
import SignInForm from './signin-form.component';

const signInForm = angular
  .module('signinform', [uiRouter, ngMessages])
  .component('signinform', SignInForm)
  .name;

export default signInForm;