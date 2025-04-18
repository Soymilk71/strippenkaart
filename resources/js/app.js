import './bootstrap';
import { createApp } from 'vue';
import FormComponent from './components/FormComponent.vue';

const app = createApp({});
app.component('form-component', FormComponent);
app.mount('#app');

