<x-tests.app>
    <x-slot name="header">
        ヘッダー1
    </x-slot>
コンポーネントテスト1
<x-tests.card title="タイトル1" content="本文" :message="$message"/>
<x-tests.card title="タイトル2" />
<x-tests.card title="CSS少し変えたい" class="bg-red-300"/>
</x-tests.app>