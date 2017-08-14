import angular from 'angular';

import Calendar from './calendar';
import Todo from './todo';
import signup from './signup.component';
import signin from './signin.component';

const components = angular
  .module('app.components', [
    Calendar,
    Todo,
    signup,
    signin
  ])
  .name;

export default components;