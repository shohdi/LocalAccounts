using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(LocalAccounts.Startup))]
namespace LocalAccounts
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
