<div class="product-card">
    <img src="{{ asset('images/' . $image) }}" alt="{{ $name }}" class="product-image">
    <h3 class="product-name">{{ $name }}</h3>
    <p class="product-price">{{ $price }}g</p>
    <x-badge color="green">Nouveau</x-badge>
    <a href="{{ route('product.show', ['id' => $id]) }}" class="product-link">
        Voir le produit
    </a>
</div>

<style>
    /* Carte produit style pixel / Stardew Valley */
    .product-card {
        background-color: #fff3c4;
        /* jaune pastel */
        border: 4px solid #f7d57d;
        /* bordure pixel épaisse */
        border-radius: 8px;
        width: 180px;
        padding: 10px;
        text-align: center;
        font-family: 'Courier New', monospace;
        /* effet pixel */
        box-shadow: 4px 4px 0px #f7d57d;
        /* effet relief type 2D */
        margin: 10px;
        display: inline-block;
        vertical-align: top;
    }

    .product-image {
        width: 120px;
        height: 120px;
        object-fit: contain;
        margin-bottom: 5px;
    }

    .product-name {
        font-weight: bold;
        color: #a0522d;
        margin-bottom: 5px;
    }

    .product-price {
        color: #8b4513;
        margin-bottom: 10px;
    }

    .product-link {
        display: inline-block;
        background-color: #f7d57d;
        color: #5c3317;
        text-decoration: none;
        font-weight: bold;
        padding: 4px 8px;
        border: 2px solid #a0522d;
        box-shadow: inset 1px 1px 0 #fff;
        transition: background 0.2s;
    }

    .product-link:hover {
        background-color: #f0c65e;
    }
</style>