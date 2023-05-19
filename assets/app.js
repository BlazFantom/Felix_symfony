/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */


// any CSS you import will output into a single css file (app.css in this case)
import './styles/css/styles.css'
import './styles/css/auth.css'
import './styles/css/appointment.css'
import './styles/css/reg.css'
import './styles/css/media.css'
import './styles/css/statisticsTables.css'
import './styles/css/droplistHeader.css'

// require jQuery normally
const $ = require('jquery');

// create global $ and jQuery variables
global.$ = global.jQuery = $;
import formChanger from './controllers/formChanger'
import classChanger from './controllers/classChanger'

// start the Stimulus application
import './bootstrap';
