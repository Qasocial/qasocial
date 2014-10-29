package QA;
import com.opensymphony.xwork2.ActionSupport;

public class loginAction extends ActionSupport
{
	private String user;
	private String password;
	public String login()
	{
		if(user.equals("wang")&&password.equals("wang"))
		{
			//System.out.println("success!");
			return "success";
		}
		else
		{
			return "error";
		}
	}
	public String getUser() {
		return user;
	}
	public void setUser(String user) {
		this.user = user;
	}
	public String getPassword() {
		return password;
	}
	public void setPassword(String password) {
		this.password = password;
	}
	
}