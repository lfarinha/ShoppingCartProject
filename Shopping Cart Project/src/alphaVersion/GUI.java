package alphaVersion;

import java.awt.Color;
import java.awt.EventQueue;
import java.awt.Image;

import javax.swing.BorderFactory;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JButton;
import javax.swing.JPanel;
import javax.swing.JTextField;

import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;

import javax.swing.JLabel;



public class GUI {

	private JFrame frame;
	private JTextField searchField;
	public String imgLtn;
	Boolean panelOn = false;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					GUI window = new GUI();
					window.frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the application.
	 */
	public GUI() {
		initialize();

	}

	/**
	 * Initialize the contents of the frame.
	 */
	
	private void initialize() {
		
		frame = new JFrame();
		frame.setBounds(100, 100, 994, 706);
		frame.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		frame.getContentPane().setLayout(null);

		
		searchField = new JTextField();
		searchField.setBounds(287, 78, 397, 20);
		frame.getContentPane().add(searchField);
		searchField.setColumns(10);
				
		JButton searchButton = new JButton("Search");
		searchButton.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				
				String searchCriteria = searchField.getText().trim();
				
				Controller newSearch = new Controller();
				
				newSearch.searchParams(searchCriteria);
				
				imgLtn = newSearch.getImageLocation();
				
				castImage(imgLtn, panelOn);
				
//				frame.getContentPane().repaint();

			}
		});
		searchButton.setBounds(440, 115, 89, 23);
		frame.getContentPane().add(searchButton);
		
	}
	public void castImage(String imgLocation, Boolean panelOn){
		JPanel panelToShowItems = new JPanel();
		JLabel imageToShow = new JLabel("");		
		
		panelToShowItems.setBounds(99, 316, 844, 237);
		panelToShowItems.setBorder(BorderFactory.createTitledBorder(BorderFactory.createLineBorder(Color.BLACK), "Item"));

		frame.getContentPane().add(panelToShowItems);
		
		Image img = new ImageIcon(this.getClass().getResource(imgLocation)).getImage();
		imageToShow.setIcon(new ImageIcon(img));
		imageToShow.setBounds(141, 257, 327, 321);			
		//frame.getContentPane().add(imageToShow);
	
		panelToShowItems.add(imageToShow);	
		panelToShowItems.invalidate();
		panelToShowItems.validate();
		panelToShowItems.repaint();
			
		frame.getContentPane().repaint();
		
		if(getPanelOn() == true){
			
			frame.getContentPane().remove(panelToShowItems);
			panelToShowItems.remove(imageToShow);
			frame.getContentPane().invalidate();
			frame.getContentPane().validate();
			frame.getContentPane().repaint();

			
			JPanel panelToShowItems2 = new JPanel();
			JLabel imageToShow2 = new JLabel("");
			
			panelToShowItems2.setBounds(99, 316, 844, 237);
			panelToShowItems2.setBorder(BorderFactory.createTitledBorder(BorderFactory.createLineBorder(Color.BLACK), "Item"));

			frame.getContentPane().add(panelToShowItems2);
		
			Image img2 = new ImageIcon(this.getClass().getResource(imgLocation)).getImage();
			imageToShow2.setIcon(new ImageIcon(img2));
			imageToShow2.setBounds(141, 257, 327, 321);
			//frame.getContentPane().add(imageToShow2);
		
			panelToShowItems2.add(imageToShow2);
			panelToShowItems2.invalidate();
			panelToShowItems2.validate();
			panelToShowItems2.repaint();
			
			frame.getContentPane().invalidate();
			frame.getContentPane().validate();
			frame.getContentPane().repaint();
			
		}
		setPanelOn(panelOn=true);
	}//End of method
	
	public void setPanelOn(Boolean panelOn){
		this.panelOn = panelOn;
	}
	
	public Boolean getPanelOn(){
		return this.panelOn;
	}
	
	
}//End of Class
