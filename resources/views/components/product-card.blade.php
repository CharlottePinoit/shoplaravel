<div class="product-card">

    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="product-image">
    <h3 class="product-name">{{ $product->name }}</h3>
    <p class="product-price">{{ $product->price }}g</p>

    <p>Catégorie : {{ $product->category->name ?? 'Aucune' }}</p>

    <x-badge color="green">Nouveau</x-badge>

    <a href="{{ route('products.show', $product->id) }}" class="product-link">
        Voir le produit
    </a>
    @auth
        @if (auth()->user()->is_admin)
            <a href="{{ route('admin.products.edit', $product->id) }}" class="product-link">
                ✏️ Modifier
            </a>

            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;"
                onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="product-link delete-button">🗑️ Supprimer</button>
            </form>
        @endif
    @endauth

    <form action="{{ route('cart.add', $product) }}" method="POST">
        @csrf
        <button type="submit" class="stardew-button">Ajouter au panier</button>
    </form>

</div>
