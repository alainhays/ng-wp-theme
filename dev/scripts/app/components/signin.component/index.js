import angular from 'angular';
import uiRouter from 'angular-ui-router';
import SignInComponent from './signin.component';
import SignInForm from './signin-form'

const signin = angular
  .module('signin', [
    uiRouter, SignInForm
  ])
  .component('signin', SignInComponent)
  .config(($stateProvider, $urlRouterProvider) => {
    $stateProvider
      .state('signin', {
        url: '/signin',
        component: 'signin'
      })
    $urlRouterProvider.otherwise('/');
    $urlRouterProvider.when('/','/signin');
  })
  .name;

export default signin;