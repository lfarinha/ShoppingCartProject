package alphaVersion;

public class ItemCollection extends Item {

	public void itemCollection(String params){
		
		String[][] ItemList = new String[10][10];
		
		//First row names
		ItemList[0][0]="ItemID";
		ItemList[0][1]="ItemName";
		ItemList[0][2]="ItemBrand";
		ItemList[0][3]="ItemPrice";
		ItemList[0][4]="ItemQtty";	
		
		//Next rows with the Items descriptions
		
		//Item 001 -- XboxOne
		ItemList[1][0]="001";
		ItemList[1][1]="XboxOne";
		ItemList[1][2]="Microsoft";
		ItemList[1][3]="350";
		ItemList[1][4]="100";
		
		//Item 001 -- PS4
		ItemList[2][0]="002";
		ItemList[2][1]="PlayStation4";
		ItemList[2][2]="Sony";
		ItemList[2][3]="350";
		ItemList[2][4]="100";
		
		//Item 001 -- WIIU
		ItemList[3][0]="003";
		ItemList[3][1]="WiiU";
		ItemList[3][2]="Nintendo";
		ItemList[3][3]="300";
		ItemList[3][4]="100";
				

//	for(int row=0; row<4; row++){
//		for (int col=0; col<5; col++){
//			printItemsInColumn(row, col, ItemList[row][col]);
//		}
//	}
	
	printItemsWhileParameter(getSpecificItem(params, ItemList));


		
	}
	
	public void printItemsInColumn(int rowNumber, int colNumber, String colToPrint){
		System.out.println("Items in row " +rowNumber+", column " +colNumber+" is --> "+colToPrint);
	}
	
	public void printItemsWhileParameter(String itemToShow){
		System.out.println("The item you are searching is --> " +itemToShow);
	}
	
	public String getSpecificItem(String params, String[][] list){
		String temp="";
		for(int row=0; row<5; row++){
			for(int col=0; col<5; col++){
				if(list[row][col] == params){
					temp = list[row][col];
				}
			}
		}
		return temp;
	}
	
}
