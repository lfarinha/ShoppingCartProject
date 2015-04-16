package alphaVersion;

public class ItemCollection {
	
	private String itemName;
	private String imageLocation;
	
	public ItemCollection(){
		
	}

	public ItemCollection(String params){
		setSpecificItem(params, fillITemDataBase());
	}
	
	public void setTempValues(String[][] temp){
        this.itemName = temp[0][0];
        this.imageLocation = temp[0][1];
        printItemsWhileParameter(itemName, imageLocation);
	}
	
	
	public String[][] fillITemDataBase(){
		
		String[][] ItemList = new String[4][6];
		
		
		//First row names
		ItemList[0][0]="ItemID";
		ItemList[0][1]="ItemName";
		ItemList[0][2]="ItemBrand";
		ItemList[0][3]="ItemPrice";
		ItemList[0][4]="ItemQtty";
		ItemList[0][5]="ImgLocation";
		
		//Next rows with the Items descriptions
		
		//Item 001 -- XboxOne
		ItemList[1][0]="001";
		ItemList[1][1]="XboxOne";
		ItemList[1][2]="Microsoft";
		ItemList[1][3]="350";
		ItemList[1][4]="100";
		ItemList[1][5]="/xboxone.jpg";
		
		//Item 002 -- PS4
		ItemList[2][0]="002";
		ItemList[2][1]="PlayStation4";
		ItemList[2][2]="Sony";
		ItemList[2][3]="350";
		ItemList[2][4]="100";
		ItemList[2][5]="/playstation4.jpg";
		
		//Item 003 -- WIIU
		ItemList[3][0]="003";
		ItemList[3][1]="WiiU";
		ItemList[3][2]="Nintendo";
		ItemList[3][3]="300";
		ItemList[3][4]="100";
		ItemList[3][5]="/wiiu.jpg";
		
		return ItemList;
		
	}

	public String[][] setSpecificItem(String params, String[][] list){
		String[][] temp = new String[1][2];
		for(int row=1; row<4; row++){
			for(int col=0; col<6; col++){
				if(list[row][col].equals(params)){
					temp[0][0] = list[row][col];
					temp[0][1] = list[row][5];
				}
			}
		}
		setTempValues(temp);
		return temp;
	}


	public String getItemName() {
        return itemName;
    }

    public String getImageLocation() {
        return imageLocation;
    }
    
	public void printItemsWhileParameter(String collectionItemName, String collectionImageLocation){
		System.out.println("The item you are searching is --> "+collectionItemName+" and the location is --> "+collectionImageLocation);
	}

	
}
