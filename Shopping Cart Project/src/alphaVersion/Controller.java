package alphaVersion;

public class Controller {
	
	private String itemName;
	private String imageLocation;
	
	
	public void searchParams(String params){
		
		ItemCollection searchItem = new ItemCollection(params);
		
		setItemInfo(searchItem.getItemName(), searchItem.getImageLocation());
				
		//System.out.println(searchItem.getItemName()+" y "+searchItem.getImageLocation());
	}

	public void setItemInfo(String ItemName, String ImageLocation ){
		this.itemName = ItemName;
		this.imageLocation = ImageLocation;
	}
	
	public String getItemName(){
		return itemName;
	}
	public String getImageLocation(){
		return imageLocation;
	}
	
	
}
