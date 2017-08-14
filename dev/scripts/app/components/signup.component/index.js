import angular from 'angular';
import uiRouter from 'angular-ui-router';
import SignUpComponent from './signup.component';

const signup = angular
  .module('signup', [
    uiRouter
  ])
  .component('signup', SignUpComponent)
  .config(($stateProvider, $urlRouterProvider) => {
    $stateProvider
      .state('signup', {
        url: '/signup',
        component: 'signup'
      })
    $urlRouterProvider.otherwise('/');
  })
  .name;

export default signup;