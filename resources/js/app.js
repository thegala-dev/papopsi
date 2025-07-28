import { createIcons, Menu, Megaphone, Baby, Home, Utensils, ChefHat, ShieldQuestion, Globe, Clock, Smile, User,
    BookUser, Carrot, RefreshCw, CheckCircle, XCircle, Timer, Bookmark, Share, Info, Copy, Send} from 'lucide';

const initIcons = () => {
    createIcons({
        icons: {
            Menu, Megaphone, Baby, Home, Utensils, ChefHat, ShieldQuestion, Globe, Clock, Smile, User, BookUser, Carrot,
            RefreshCw, CheckCircle, XCircle, Timer, Bookmark, Share, Info, Copy, Send
        }
    })
};

Livewire.hook('morph.updated', ({ el, component }) => {
    initIcons();
})

initIcons()

