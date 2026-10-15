import L from 'leaflet';
import 'leaflet/dist/leaflet.css';
import './about-map.css';

export function initAboutMap(container) {
    const status = container.querySelector('[data-map-status]');
    const setStatus = (message) => {
        if (!status) return;
        status.textContent = message;
        status.hidden = false;
    };
    let locations;

    try {
        locations = JSON.parse(container.dataset.locations || '[]');
    } catch {
        setStatus(container.dataset.unavailable);
        return;
    }

    if (!Array.isArray(locations) || locations.length === 0) {
        setStatus(container.dataset.unavailable);
        return;
    }

    try {
        const map = L.map(container, {
            scrollWheelZoom: false,
            zoomControl: true,
            keyboard: true,
        });
        const markers = locations.map((location) => {
            const marker = L.marker([location.latitude, location.longitude], {
                title: `${location.name}: ${container.dataset.markerDescription}`,
                keyboard: true,
                icon: L.divIcon({
                    className: 'service-area-map__marker',
                    html: '<span aria-hidden="true"></span>',
                    iconSize: [26, 34],
                    iconAnchor: [13, 32],
                }),
            });

            marker.bindTooltip(location.name, {
                permanent: true,
                direction: 'top',
                offset: [0, -25],
                className: 'service-area-map__label',
            });

            const popup = document.createElement('div');
            popup.className = 'service-area-map__popup';
            const name = document.createElement('strong');
            name.textContent = location.name;
            const description = document.createElement('span');
            description.textContent = container.dataset.markerDescription;
            popup.append(name, description);
            marker.bindPopup(popup, { minWidth: 150, maxWidth: 220 });

            marker.on('add', () => {
                marker.getElement()?.setAttribute(
                    'aria-label',
                    `${location.name}: ${container.dataset.markerDescription}`,
                );
            });

            return marker.addTo(map);
        });

        const markerBounds = L.featureGroup(markers).getBounds();
        map.fitBounds(markerBounds.pad(0.14), { maxZoom: 7, animate: false });

        let hasTileError = false;
        const tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        });

        tiles.on('tileerror', () => {
            hasTileError = true;
            setStatus(container.dataset.tilesUnavailable);
        });
        tiles.on('tileload', () => {
            if (!hasTileError && status) status.hidden = true;
        });
        tiles.addTo(map);
        map.whenReady(() => {
            if (!hasTileError && status) status.hidden = true;
            requestAnimationFrame(() => map.invalidateSize());
        });
    } catch {
        setStatus(container.dataset.unavailable);
    }
}
