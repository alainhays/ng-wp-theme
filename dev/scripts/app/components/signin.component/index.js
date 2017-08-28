import angular from 'angular';
import uiRouter from 'angular-ui-router';
import SignInComponent from './signin.component';
import SignInForm from './signin-form';

import SignInService from './signin.service';

const signin = angular
  .module('signin', [
    uiRouter, SignInForm
  ])
  .component('signin', SignInComponent)
  .service('SignInService', SignInService)
  .config(($stateProvider, $urlRouterProvider) => {
    $stateProvider
      .state('signin', {
        url: '/signin',
        component: 'signin'
      });
    $urlRouterProvider.otherwise('/');
  })
  .name;

export default signin;