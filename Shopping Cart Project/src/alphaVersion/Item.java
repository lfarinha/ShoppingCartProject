package alphaVersion;


public class Item {
	
	int itemID, itemQtty;
	String itemName, temBrand;
	
	public void getItem(String params){
		
		ItemCollection searchItemInList = new ItemCollection();
		
		searchItemInList.itemCollection(params);
		
	}
	
	public String returnItem(){
		
		
		return "0";
	}
	
}
