require('./bootstrap');
require('jquery/dist/jquery.js');
require('bootstrap/dist/js/bootstrap.js');
require('bootstrap-star-rating/js/star-rating.js');
require('@fullcalendar/core');
require('@fullcalendar/daygrid');
require('@fullcalendar/core');
require('@fullcalendar/interaction');
require('@fullcalendar/list');
require('@fullcalendar/timegrid');
require('leaflet/dist/leaflet.js');
global.Fullcalendar = require('fullcalendar');
global.$ = global.jQuery = require('jquery');
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
