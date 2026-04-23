import PlayersModule from './components/modules/PlayersModule.js'

export default function App() {

    const root = document.getElementById('igk-admin');

    const module = root.dataset.module;
    const view = root.dataset.view;

    if (module === 'players') {
        return <PlayersModule view={view} />;
    }

    return null;
}