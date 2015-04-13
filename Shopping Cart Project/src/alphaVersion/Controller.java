package alphaVersion;

public class Controller {
	
	public void searchItem(String params){
		
		Item searchItem = new Item();
		
		searchItem.getItem(params);
		
	}
	
	public void addItemToCart(String params){
		
		Item addItemToCart = new Item();
		
		addItemToCart.getItem(params);
		
		//ShoppingCart cart = new ShoppingCart();
				
	}
	

}
