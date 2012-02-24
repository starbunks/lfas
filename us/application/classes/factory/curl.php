<?php defined('SYSPATH') or die('No direct script access.');

class Factory_Curl {

	//protected $curl_url = "http://api.sittercity.com/childcare/caregiver?z=60610&ps=25";
	protected $curl_url;


	public function setCurlUrl($url) 
	{
		$this->curl_url = $url;
	}

	public function getCurlUrl() 
	{
		return $this->curl_url;
	}


	/*
	* @return false if errors else xml
	*/
	public function getCurlData() 
	{
		libxml_use_internal_errors(true);
		$xml = new SimpleXmlElement($this->getCurl($this->getCurlUrl()), LIBXML_NOCDATA);
//		$xml = new SimpleXmlElement($this->get60610());
		$a_xml_errors = libxml_get_errors();

		if (count($a_xml_errors) == 0) 
		{
			return $xml;
		}
		else 
		{
			libxml_clear_errors();
			return 'false';
		}
	}


	/**
	* getCurl
	*
	* @param String $curl_url
	* @return curl output
	*/
	public function getCurl($curl_url) 
	{
		// create a new cURL resource
		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $curl_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
		curl_setopt($ch, CURLOPT_HEADER, 0);

		// grab URL and pass it to the browser
		curl_exec($ch);
		$server_output = curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);
		return $server_output;
	}


	public function get60610() 
	{
	  $xml = <<< XML
<?xml version="1.0" encoding="UTF-8"?>
<SearchResults version="1.0"><TotalResults>41031</TotalResults><Caregivers>
<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/245782.html]]></ProfileUrl><Name><![CDATA[Kelly F.]]></Name><Comment><![CDATA[Hello! Thank you for taking time to read my profile. My name is Kelly. I am 22 years old and a senior at Loyola University Chicago. I grew up in Toledo, OH and I have been babysitting since I was...]]></Comment><Subtitle><![CDATA[An Au Pair, Babysitter, Mother's Helper and Nanny in Chicago, IL 60611]]></Subtitle><IsSupersitter/><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/4/12/73/04_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[2]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2009-12-27]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/1153842.html]]></ProfileUrl><Name><![CDATA[Chelsea S.]]></Name><Comment><![CDATA[My name is Chelsea Sniadach and I am twenty years old. I'm currently a sophomore at Moody Bible Institute studying TESOL (Teaching English to Speakers of Other Languages) and Bible. I am an...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60610]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/1/89/09/34_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2009-12-29]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/598224.html]]></ProfileUrl><Name><![CDATA[Nicole L.]]></Name><Comment><![CDATA[*** Looking for Part Time / Full Time Work - H1N1 VACCINATED ***
	Mary Poppins Apprentice is ready and available to help you and your family!
	Are you in need of a caring, dependable, outgoing,...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60610]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/4/56/85/02_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[3]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2009-12-17]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/942634.html]]></ProfileUrl><Name><![CDATA[Brieanna P.]]></Name><Comment><![CDATA[Hello, my name is Brieanna Paluska and I would love to become a part of your family! I love children more than anything, and want to feel a part of a family and be involved in a growing experience...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60611]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/4/68/08/78_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2009-12-29]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/840384.html]]></ProfileUrl><Name><![CDATA[Jacqueline M.]]></Name><Comment><![CDATA[Hello! I am a student at DePaul University, therefore I am very close to northside neighborhoods in Chicago. I have come to love kids by having so many little cousins in my family, and their...]]></Comment><Subtitle><![CDATA[A Babysitter and Nanny in Chicago, IL 60614]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/3/59/86/86_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[2]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-29]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/315082.html]]></ProfileUrl><Name><![CDATA[Stephanie S.]]></Name><Comment><![CDATA[Hello there!&nbsp;&nbsp;Below is extended information based on my profile and my life thus far. I am a 24 year old, female living in Old Town, Chicago.Past Experience:I was a camp counselor for 4...]]></Comment><Subtitle><![CDATA[A Babysitter in Chicago, IL 60610]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/3/95/76/8_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2009-12-29]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/22094.html]]></ProfileUrl><Name><![CDATA[Noelle Z.]]></Name><Comment><![CDATA[Thanks for looking at my profile! First of all I would like to say that I truly enjoy children! I have been sitting since jr. high ( I was the super-sitter of the neighborhood!) and have continued...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60607]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/5/76/31/96_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[4]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-28]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/979215.html]]></ProfileUrl><Name><![CDATA[Keri D.]]></Name><Comment><![CDATA[I am going to be a Sophomore at Loyola University, majoring in Nursing.  I will be living downtown two blocks from N. Michigan Ave.  I would love to find a family who needs my help, I will be...]]></Comment><Subtitle><![CDATA[A Babysitter and Nanny in Chicago, IL 60611]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/3/70/74/90_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[2]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2009-12-28]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/257498.html]]></ProfileUrl><Name><![CDATA[shauna c.]]></Name><Comment><![CDATA[I have extensive experience caring for newborn/infants and toddlers. I find the development process of new life to be truly amazing, and I enjoy the role of nurturing care-giver; watching an infant...]]></Comment><Subtitle><![CDATA[A Babysitter and Nanny in Chicago, IL 60622]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/2/24/45/66_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[4]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-24]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/766191.html]]></ProfileUrl><Name><![CDATA[Hannah T.]]></Name><Comment><![CDATA[Hello families!My name is Hannah, and I want to care for your kidlettes! I grew up in Ashland, Oregon...a breathtaking part of the country, doing Home-Daycare with my mother, while I myself was...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60622]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/3/54/00/02_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-26]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/287302.html]]></ProfileUrl><Name><![CDATA[Ally S.]]></Name><Comment><![CDATA[I am a senior at DePaul University and am graduating this Spring. I play soccer and used to be a gymnast in high school & my favorite hobby is to read. I started baby-sitting when I was 12 as a...]]></Comment><Subtitle><![CDATA[A Babysitter and Nanny in Chicago, IL 60614]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/3/68/83/1_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-26]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/1208348.html]]></ProfileUrl><Name><![CDATA[Sammi O.]]></Name><Comment><![CDATA[Hi! I am an enthusiastic and passionate educator and mentor.&nbsp;I believe children can thrive and maintain holistic wellness in an encouraging environment that is appropriate to their unique...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60614]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/4/87/88/51_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-27]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/1147603.html]]></ProfileUrl><Name><![CDATA[Mary T.]]></Name><Comment><![CDATA[I am a Junior at DePaul University in Chicago, Il.  I started babysitting for a family down the street when I was 12 for two years for a boy who was four.  I also assisted my friend with a family...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60614]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/3/83/18/38_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-30]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/1119340.html]]></ProfileUrl><Name><![CDATA[Tamaka K.]]></Name><Comment><![CDATA[Hello&nbsp;my name is Tamaka &amp; I have Open Availability &amp; I have both a Background Check on file &amp; Great References, I have Flexible Availability which means for me that I will be able...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60622]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/5/81/21/95_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[6]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-29]]></LastLogin></Caregiver>

	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/829997.html]]></ProfileUrl><Name><![CDATA[Katie L.]]></Name><Comment><![CDATA[Hello! 
	My name is Katie, and I am currently seeking wonderful families to babysit for occasionally in the evenings and on weekends! I have been blessed with the opportunity to spend time with...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60657]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/4/59/09/20_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[3]]></FeedbackCount><Distance><![CDATA[3]]></Distance><LastLogin><![CDATA[2009-12-29]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/436210.html]]></ProfileUrl><Name><![CDATA[Maria K.]]></Name><Comment><![CDATA[Here is a little background info! :)
	I am a graduate from Edina High School in Minnesota. In high school I was captain of the varsity cheerleading squad and I played Lacrosse in the spring. I was...]]></Comment><Subtitle><![CDATA[A Babysitter and Nanny in Chicago, IL 60611]]></Subtitle><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/4/20/23/78_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[3]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2009-12-22]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/793841.html]]></ProfileUrl><Name><![CDATA[Heidi B.]]></Name><Comment><![CDATA[Hello
	My name is Heidi and I am looking for a nanny position. I have a total of 6 years experience working as a nanny. I love working with children of all ages. I guess what I enjoy the most is...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60614]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/3/69/97/83_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-17]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/1160303.html]]></ProfileUrl><Name><![CDATA[Anna D.]]></Name><Comment><![CDATA[I am a 22 year old female college graduate from Dominican University, I just graduated this spring 2009 with A Studio Art Major and Education Major (Awaiting teaching certificate). Loves sports!...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Lincoln Park, IL 60614]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/4/83/64/36_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-23]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/987395.html]]></ProfileUrl><Name><![CDATA[Egle B.]]></Name><Comment><![CDATA[Responsible          Tolerant   Organized
	Energetic               Happy        Trustworthy
	Hard worker          Open minded
	Communicable     Artistic
	Great at multitasking
	People say,...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60605]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/2/71/72/32_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-29]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/56260.html]]></ProfileUrl><Name><![CDATA[Deanna C.]]></Name><Comment><![CDATA[]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60614]]></Subtitle><IsSupersitter/><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/3/44/91/6_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2009-12-24]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/7644.html]]></ProfileUrl><Name><![CDATA[Gina D.]]></Name><Comment><![CDATA[I speak some spanish, but not much, I have no issues with any animals. I have a Bachelors in Psychology and am currently working on my doctoral degree in Clinical Psychology.&nbsp; As a courtesy to...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60601]]></Subtitle><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/4/18/79/32_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[1]]></Distance><LastLogin><![CDATA[2009-12-23]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/35982.html]]></ProfileUrl><Name><![CDATA[Cristina S.]]></Name><Comment><![CDATA[I am a 26 year-old professional who loves working with children. I live and work in the city near downtown. I know the city very well and can get around easily.
	About my childcare experience...It...]]></Comment><Subtitle><![CDATA[A Babysitter and Mother's Helper in Chicago, IL 60601]]></Subtitle><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/4/87/37/22_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[1]]></Distance><LastLogin><![CDATA[2009-12-18]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/696392.html]]></ProfileUrl><Name><![CDATA[Kiley B.]]></Name><Comment><![CDATA[HI! My name is Kiley and I am a 26 year old female and I know I can be a GREAT fit for you and your children, especially if you like to be creative and fun! I am a responsible, reliable, and caring...]]></Comment><Subtitle><![CDATA[A Babysitter, Mother's Helper and Nanny in Chicago, IL 60654]]></Subtitle><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/5/40/16/46_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2009-12-29]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/196524.html]]></ProfileUrl><Name><![CDATA[Melissa C.]]></Name><Comment><![CDATA[Hello! Welcome.
	While using sittercity I babysat for several families and had great experiences! Generally I watched 1-3 children at their home. I referred many friends and families to the...]]></Comment><Subtitle><![CDATA[A Babysitter in Chicago, IL 60647]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/5/78/21/70_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[3]]></FeedbackCount><Distance><![CDATA[3]]></Distance><LastLogin><![CDATA[2009-12-17]]></LastLogin></Caregiver>
	<Caregiver><ProfileUrl><![CDATA[http://babysitters.sittercity.com/profile/224366.html]]></ProfileUrl><Name><![CDATA[Dionne M.]]></Name><Comment><![CDATA[]]></Comment><Subtitle><![CDATA[A Babysitter and Nanny in Chicago, IL 60610]]></Subtitle><IsSupersitter/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/5/35/18/2_t.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[4]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2009-12-07]]></LastLogin></Caregiver>
	</Caregivers></SearchResults>
XML;

  $xml2 = <<<XML
<?xml version='1.0' standalone='yes'?>
<movies>
 <movie>
  <title>PHP: Behind the Parser</title>
  <characters>
   <character>
    <name>Ms. Coder</name>
    <actor>Onlivia Actora</actor>
   </character>
   <character>
    <name>Mr. Coder</name>
    <actor>El Act&#211;r</actor>
   </character>
  </characters>
  <plot>
   So, this language. It's like, a programming language. Or is it a
   scripting language? All is revealed in this thrilling horror spoof
   of a documentary.
  </plot>
  <great-lines>
   <line>PHP solves all my web problems</line>
  </great-lines>
  <rating type="thumbs">7</rating>
  <rating type="stars">5</rating>
 </movie>
</movies>
XML;

	return $xml;
	}
	
	
	
} // End