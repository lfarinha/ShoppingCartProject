package alphaVersion;

public class ReturnItemCollection{
	
	private String itemName;
	private String imageLocation;

	public ReturnItemCollection(){
		printItemsWhileParameter(itemName, imageLocation);
	}
	     
    public ReturnItemCollection(String itemName, String imageLocation) {
        this.itemName = itemName;
        this.imageLocation = imageLocation;
    }
    
	public String getItemName() {
        return itemName;
    }

    public String getImageLocation() {
        return imageLocation;
    }
    
	public void printItemsWhileParameter(String collectionItemName, String collectionImgLocation){
		System.out.println("The item you are searching is --> " +collectionItemName+" and the location is --> "+collectionImgLocation);
	}

}
