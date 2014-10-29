package QA;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.*;

import DBUtil.DBUtil;

import com.opensymphony.xwork2.ActionSupport;

public class QAAction extends ActionSupport {
	private List<QA> list;
	private QAService QAService = new QAService(); 
	private String question;
	private String answer;
	Map<String, Object> map;
	public void setRequest(Map<String, Object> map) {
		  this.map = map;
		}
	public String add() {
		QAService.add(question,answer);
		return "success";
	}
	public String List() {
		Connection conn = DBUtil.getConn();
		String sql = "select question from qa";
		PreparedStatement ps = DBUtil.prepare(conn, sql);
		try {
			list =new ArrayList<QA>();
			ResultSet rs = ps.executeQuery();
			while (rs.next()) {
				QA b = new QA();
				b.setQuestion(rs.getString("question"));
				list.add(b);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		DBUtil.close(ps);
		DBUtil.close(conn);
		return "success";
	}
	public QAService getQAService() {
		return QAService;
	}

	public void setQAService(QAService QAService) {
		this.QAService = QAService;
	}
	public String getQuestion() {
		return question;
	}
	public void setQuestion(String question) {
		this.question = question;
	}
	public String getAnswer() {
		return answer;
	}
	public void setAnswer(String answer) {
		this.answer = answer;
	}
	public List<QA> getList() {
		return list;
	}
	public void setList(List<QA> list) {
		this.list = list;
	}
}
