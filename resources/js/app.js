import { Livewire } from '../../vendor/livewire/livewire/dist/livewire.esm';
import { createIcons, Menu, Megaphone, Baby, Home, Utensils, UtensilsCrossed, Sparkles, Coffee, ChefHat, ShieldQuestion, Globe, Clock, Smile, User,
    BookUser, Carrot, RefreshCw, CheckCircle, XCircle, Timer, Bookmark, Share, Info, Copy, Send, Heart} from 'lucide';

// Icons
const initIcons = () => {
    createIcons({
        icons: {
            Menu, Megaphone, Baby, Home, Utensils, UtensilsCrossed, Sparkles, Coffee, ChefHat, ShieldQuestion, Globe, Clock, Smile, User, BookUser, Carrot,
            RefreshCw, CheckCircle, XCircle, Timer, Bookmark, Share, Info, Copy, Send, Heart
        }
    })
};

initIcons()

// Tracking
window.dataLayer = window.dataLayer || [];
window.debugMode = import.meta.env.VITE_APP_DEBUG_ANALYTICS === 'true';
window.trackEvent = function (eventName, data = {}) {
    window.dataLayer.push({
        event: eventName,
        ...data
    });
    if (window.debugMode) {
        console.log(`[Tracking] ${eventName}`, data);
    }
};

// Livewire init
document.addEventListener('livewire:init', () => {
    Livewire.hook('morph.updated', ({ el, component }) => {
        initIcons();
    });

    Livewire.on('wizardStarted', () => {
        window.trackEvent('wizard_started');
    });

    Livewire.on('wizardStep', (step, context) => {
        window.trackEvent('wizard_step', { step, context: JSON.stringify(context) });
    });

    Livewire.on('recipeGenerated', (recipe) => {
        window.trackEvent('recipe_generated', { recipe: recipe.title });
    });

    Livewire.on('recipeShared', (recipe, channel) => {
        window.trackEvent('recipe_shared', { recipe: recipe.title, channel });
    });

    Livewire.on('premiumActivated', (tier) => {
        window.trackEvent('premium_activated', { tier });
    });

    Livewire.on('limitReached', (totalRecipes, dailyLimit) => {
        window.trackEvent('limit_reached', { totalRecipes, dailyLimit });
    });

    Livewire.on('error', (type, message) => {
        window.trackEvent('error', { type, message });
    });
});

Livewire.start()

// Page view
window.trackEvent('page_view', {
    pageName: document.body.dataset.view ?? 'no-name'
})
