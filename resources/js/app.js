import './bootstrap';
import './city-hero';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

Alpine.plugin(collapse);

window.Alpine = Alpine;
Alpine.start();

const serviceAreaMap = document.getElementById('service-area-map');

if (serviceAreaMap) {
    import('./about-map')
        .then(({ initAboutMap }) => initAboutMap(serviceAreaMap))
        .catch(() => {
            const status = serviceAreaMap.querySelector('[data-map-status]');
            if (status) {
                status.textContent = serviceAreaMap.dataset.unavailable;
                status.hidden = false;
            }
        });
}
