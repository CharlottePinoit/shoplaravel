<h1>{{$product->name}}</h1>
<p>{{$product->description}}</p>
<p>Prix : {{$product->price}} g</p>
<p>Stock : {{$product->stock}}</p>
<p>Statut : {{$product->active ? 'Actif' : 'Inactif'   }}</p>
<a href="/products">Retour à la liste des produits</a>