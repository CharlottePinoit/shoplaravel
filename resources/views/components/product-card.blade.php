<div class="product-card">
    <img src="{{ asset('images/' . $image) }}" alt="{{ $name }}" class="product-image">
    <h3 class="product-name">{{ $name }}</h3>
    <p class="product-price">{{ $price }}g</p>
    <x-badge color="green">Nouveau</x-badge>
    <a href="{{ route('products.show', ['product' => $id]) }}" class="product-link">
        Voir le produit
    </a>
    <a href="{{ route('products.edit', $id) }}" class="product-link">
        ✏️ Modifier
    </a>
    <form action="{{ route('products.destroy', $id) }}" method="POST" style="display:inline;"
        onsubmit="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="product-link delete-button">🗑️ Supprimer</button>
    </form>
</div>
