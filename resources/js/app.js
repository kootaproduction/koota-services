import './bootstrap';
import './city-hero';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';

Alpine.plugin(collapse);

Alpine.data('kootaChatbot', () => ({
    isOpen: false,
    draft: '',
    isSending: false,
    messages: [
        {
            role: 'bot',
            text: 'Halo! Saya asisten virtual KOOTA Services. Ada yang bisa kami bantu seputar pembersihan rumah (home cleaning), perbaikan & tukang, atau pengangkutan sampah?'
        }
    ],
    suggestions: [
        'Cuci toren air & tandon',
        'Sedot tungau kasur & sofa',
        'Perbaikan atap bocor',
        'Angkut puing renovasi',
        'Apakah survei gratis?'
    ],
    toggleChat() {
        this.isOpen = !this.isOpen;
        window.dispatchEvent(new CustomEvent('koota-chat-state', { detail: { isOpen: this.isOpen } }));
        if (this.isOpen) {
            this.$nextTick(() => {
                this.scrollToBottom();
                if (this.$refs.chatInput) {
                    this.$refs.chatInput.focus();
                }
            });
        }
    },
    closeChat() {
        this.isOpen = false;
        window.dispatchEvent(new CustomEvent('koota-chat-state', { detail: { isOpen: false } }));
    },
    sendSuggestion(text) {
        if (this.isSending) return;
        this.draft = text;
        this.sendMessage();
    },
    async sendMessage() {
        const message = (this.draft || '').trim();
        if (!message || this.isSending) return;

        this.messages.push({ role: 'user', text: message });
        this.draft = '';
        this.isSending = true;
        this.$nextTick(() => this.scrollToBottom());

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            const response = await fetch('/chatbot/message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ message })
            });

            if (!response.ok) {
                throw new Error('HTTP ' + response.status);
            }

            const data = await response.json();
            const reply = data?.reply || 'Maaf, saya belum dapat menjawab saat ini. Silakan hubungi WhatsApp resmi KOOTA Services di 0812-1759-7109.';
            this.messages.push({ role: 'bot', text: reply });
        } catch (error) {
            this.messages.push({
                role: 'bot',
                text: 'Maaf, terjadi kendala koneksi. Silakan hubungi tim kami via WhatsApp resmi di 0812-1759-7109.'
            });
        } finally {
            this.isSending = false;
            this.$nextTick(() => this.scrollToBottom());
        }
    },
    scrollToBottom() {
        if (this.$refs.messageContainer) {
            this.$refs.messageContainer.scrollTop = this.$refs.messageContainer.scrollHeight;
        }
    }
}));

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
