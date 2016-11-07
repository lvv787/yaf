+ tests              // 这里测试用例的目录，以下目录结构和application一致，测试文件尾部增加Test标识
  | + controllers
     - UserTest.php  // test user controller
  | + library        // test library
  | + modules        // test modules
  | + models         // test models
  | + plugins        // test plugins
  | + services       // test Services
  | - phpunit.xml    // 里面配置的需要测试的测试用例
  | - YafUnit.php    // 用于模拟测试的核心类，含有View/Request
  | - TestCase.php   // 测试基类，所有测试类将会继承这个类，在基境时加载需要的Yaf信息